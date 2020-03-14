
//DATA controller
var dataController = (function () {

    //calculate keto plan
    function calculateKeto(userData) {

        function calcBMI() {
            var BMI;
            console.log(userData)
            BMI = userData.units.weight / Math.pow((userData.units.height / 100), 2);
            
            return BMI;
        }

        function calcBMR() {
            var BMR;
            if (userData.units.pol === 'musko') {

                BMR = (10 * userData.units.weight) + (6.25 * userData.units.height) - (5 * userData.units.age) + 5;

            }
            if (userData.units.pol === 'zensko') {

                BMR = (10 * userData.units.weight) + (6.25 * userData.units.height) - (5 * userData.units.age) - 161;

            }
            return BMR;
        };

        function calcIntensity() {

            return userData.workoutType;

        };

        function calcObjective() {

            if (userData.weightGoal === '1') {
                return ((calcBMR() * calcIntensity()) / 100) * 20;
            }

            if (userData.weightGoal === '2') {
                return 0;
            }

            if (userData.weightGoal === '3') {
                return ((calcBMR() * calcIntensity()) / 100) * (-10);
            }
        }


        function getCalorieIntake() {

            /* if (userData.units.pol === 'musko') { */

            return (calcBMR() * calcIntensity()) - calcObjective();

            /* } */

            if (userData.units.pol === 'zensko') {
                return (calcBMR() * calcIntensity()) - calcObjective();;
            }


        }

        // napraviti da returnuje objekat sa kalkulacijom potrebnih masti potrebnih ugljenih hidrata i potrebnih proteina
        //return calorie intake requirements
        return {
            getCalorieIntake,
            calcBMR,
            calcBMI
        }
    }

    return {
        calculateKeto
    }

})();



//UI controller
var UIController = (function () {

    function slideBMIArrow(dataCtrl, input) {
        var bmiArrow = document.getElementById("bmi-arrow");
        var containerWidth = document.getElementById('slideBMIArrow').clientWidth();
        var arrowPosition = containerWidth
        
        bmiArrow.style.marginLeft = `${dataCtrl.calculateKeto(input).calcBMI()}px`

    }

    function fillResults(dataCtrl, input) {

        document.getElementById("dnevni-unos-kalorija").textContent = dataCtrl.calculateKeto(input).getCalorieIntake();

        document.getElementById("bmi-value").textContent = dataCtrl.calculateKeto(input).calcBMI().toFixed(1);
    }

    //add active class to selected sex button 
    function addActive(event, state) {

        //if clicked on sex selection buttons
        var clickedButton = event.target;
        var notClickedButton = event.target.previousElementSibling || event.target.nextElementSibling;

        if (!clickedButton.classList.contains('active')) {
            clickedButton.classList.add('active');
            notClickedButton.classList.contains('active') ? notClickedButton.classList.remove('active') : null;
        }

    }

    //validate user input
    function validateInput(state) {
        var allInputFields = document.querySelectorAll('#step-1 > .input-holder > input');
        var noEmptyFields = false;
        var sexSelected = false;
        var errorMsgContainer = document.querySelector('#step-1 > .error-msg');
        var sexSelectionButtons = document.querySelector('#step-1 > .units-toggler').children;

        //check if male||female button is selected
        for (var i = 0; i < sexSelectionButtons.length; i++) {

            if (sexSelectionButtons[i].classList.contains('active')) {
                sexSelected = true;
                break;

            } else {
                sexSelected = false;
                sexSelectionButtons[i].focus();
                errorMsgContainer.innerHTML = `Morate popuniti polje pol`;
                errorMsgContainer.style.display = 'block';
            }
        }

        //check each field - if empty show error msg 
        for (var i = allInputFields.length - 1; i >= 0; i--) {

            if (allInputFields[i].value == '') {
                console.log('there are empty fields')
                noEmptyFields = false;
                allInputFields[i].focus();
                errorMsgContainer.innerHTML = `Morate popuniti polje ${allInputFields[i].dataset.input_question}`;
                errorMsgContainer.style.display = 'block';
            } else noEmptyFields = true;
        }

        //if there are no empty fields and sex is selected return true
        if (sexSelected === true && noEmptyFields === true) {
            errorMsgContainer.style.display = 'none';
            return true
        } else return false; // else return false

    }

    //hide current page
    function hideCurrentPage(state) {
        var currentPage = state.activePage(); //get current active page
        //remove active class from current page
        currentPage.classList.remove('active');

    }

    //show next page
    function showNextPage(state) {
        //update current page number
        state.currentPageNum++;

        //add active class to next page
        document.querySelector(`#step-${(state.currentPageNum)}`).classList.add('active');


    }

    function showPreviousPage(state) {

        //add active class to previous page
        document.querySelector(`#step-${(state.currentPageNum - 1)}`).classList.add('active');

        //update current page number
        state.currentPageNum--;
    }

    //current page input
    function currentPageInput(event, stateObj, inputObj) {
        var currentPage = stateObj.activePage();
        var answerType = stateObj.answerType();
        var question = stateObj.questionType();

        var units = {
            pol: '',
            age: null,
            height: null,
            weight: null,
            target_weight: null
        },
            excludeMeat = [],
            excludeOthers = [],
            workoutType = null,
            weightGoal = null;


        // 1. IF ACTIVE PAGE HAS INPUT FIELDS

        // if active page has input fields
        if (answerType === 'input') {

            //NodeList of all input fields
            var allInputFields = document.querySelectorAll('#step-1 > .input-holder > input');
            var allSexFields = document.querySelectorAll('#step-1 > .units-toggler > button');

            //add chosen sex to units
            for (let sex of allSexFields) {

                if (sex.classList.contains('active')) {

                    units['pol'] = sex.dataset.sex;

                }

            };

            //iterate input fields and add to inputObj
            for (let input of allInputFields) {

                units[`${input.dataset.input_question}`] = `${input.value}`;

            };

            return units;
        }


        // 2. IF ACTIVE PAGE INPUT IS RADIO BUTTONS

        // if there is multiple answers to check (there is a next button)
        if (answerType === 'multiple') {
            var questionType = stateObj.questionType(); //currentQuestionType
            var allCheckedAnswers = document.querySelectorAll(`#step-${stateObj.currentPageNum} > .fancy-checkbox-holder > .checked`); //NodeList of all checked answers
            var excludeMeatList = [];
            var excludeOthers = [];

            //add meat question checked answers to inputObj
            if (questionType === 'excludeMeat') {

                for (let checkedAnswer of allCheckedAnswers) {

                    excludeMeatList.push(checkedAnswer.dataset.answer);

                    if (excludeMeatList.includes(checkedAnswer)) {

                        excludeMeatList.filter(answer => {
                            return answer == checkedAnswer.dataset.answer;
                        })
                    }
                }
                return excludeMeatList;
            }

            //add other ingredients checked answers to inputObj
            if (questionType === 'excludeOthers') {

                for (let checkedAnswer of allCheckedAnswers) {
                    excludeOthers.push(checkedAnswer.dataset.answer);

                    if (excludeOthers.includes(checkedAnswer)) {

                        excludeOthers.filter(answer => {
                            return answer == checkedAnswer.dataset.answer;
                        })
                    }

                }
                return excludeOthers;
            }

        }

        //if there is only one possible answer (no next button)
        if (answerType === 'single') {

            //add answer to temp variable
            questionType = event.target.dataset.answer;

            // return for populating data of global app controller > input object
            return questionType;

        }



    }


    //IIFE returns
    return {
        currentPageInput,
        hideCurrentPage,
        showNextPage,
        showPreviousPage,
        addActive,
        validateInput,
        fillResults,
        slideBMIArrow
        /* updateCurrentPageState, */
        /* activePage */
    }

})();



//Global app controller
var controller = (function (UICtrl, dataCtrl) {

    //user input object
    var input = {
        units: {
            pol: '',
            age: null,
            height: null,
            weight: null,
            target_weight: null
        },
        excludeMeat: [],
        excludeOthers: [],
        workoutType: null,
        weightGoal: null
    }

    //app state
    var state = {
        activePage: function () {
            return document.querySelector('.step.active');
        },
        activePageChildren: function () {
            return document.querySelector('.step.active').children;
        },
        answerType: function () {
            return document.querySelector('.step.active').dataset.answer_type;
        },
        questionType: function () {
            return document.querySelector('.step.active').dataset.question_type;
        },
        questionMode: function () {
            return document.querySelector('.step.active').dataset.mode;
        },
        currentPageNum: 1
    }

    var userInfo = {
        userBMI: function() {
            return dataCtrl.calculateKeto().calcBMI();
        },
        userBMR: dataCtrl.calculateKeto().calcBMR,
        userCalorie: dataCtrl.calculateKeto().getCalorieIntake
    }




    //next button handler
    var ctrlBtnHandler = function (event) {

        // if single answer fancy-radio button is clicked
        if (event.target.dataset.btn === 'single') {

            //if final question is answered - send data to php script
            if (state.questionMode() === 'final-question') {

                // 1. store user input
                input[`${state.questionType()}`] = UICtrl.currentPageInput(event, state, input);

                // 2. hide quiz
                document.getElementById("quiz").classList.add("hide");

                // 3. show result page
                document.getElementById("app").classList.remove("hide");
                document.getElementById("app").classList.add("active");

                var resultActive = new Event('resultActive');

                // Dispatch the event.
                document.dispatchEvent(resultActive);

                /* UICtrl.fillResults(dataCtrl, input);

                UICtrl.slideBMIArrow(dataCtrl.calculateKeto().calcBMI()) */


            }

            // if its not final question
            if (state.questionMode() === 'question') {

                // 1. store user input
                input[`${state.questionType()}`] = UICtrl.currentPageInput(event, state, input);

                // 3. hide current page
                UICtrl.hideCurrentPage(state);

                // 4. show next next page
                UICtrl.showNextPage(state);

            }




        }
        console.log(input)
        //male-female button handler
        if (state.questionType() === 'units' && event.target.dataset.sex) {
            UICtrl.addActive(event, state);
        }

        //if next button
        if (event.target.dataset.btn === 'next') {

            if (state.activePage().id == 'step-1') {


                if (UICtrl.validateInput(state) === true) {
                    console.log('running validate input...')
                    // 1. store user input
                    input[`${state.questionType()}`] = UICtrl.currentPageInput(event, state, input);

                    // 3. hide current page
                    UICtrl.hideCurrentPage(state);

                    // 4. show next next page
                    UICtrl.showNextPage(state);

                    /* // 5. update current page state
                    UICtrl.updateCurrentPageState(state) */
                }


            } else {

                // 1. store user input
                input[`${state.questionType()}`] = UICtrl.currentPageInput(event, state, input);

                // 3. hide current page
                UICtrl.hideCurrentPage(state);

                // 4. show next next page
                UICtrl.showNextPage(state);
            }




        }

        //if next btn on first page



        //if multiple answers fancy-radio button is clicked
        if (event.target.dataset.btn === 'check') {

            // 1. get user input
            event.target.classList.toggle('checked');

            // 2. toggle styling to checked button
            event.target.classList.toggle('active');

            // 2. toggle checked class to clicket button
            input[`${state.questionType()}`] = UICtrl.currentPageInput(event, state, input);

        }



        //if back button is clicked
        if (event.target.dataset.btn === 'back') {

            //delete stored answers from current page
            input[`${state.questionType()}`] = null;

            // 1. hide current page
            UICtrl.hideCurrentPage(state);

            // 2. show previous page
            UICtrl.showPreviousPage(state);


        }

    }

    /* var resultsPageActive = new CustomEvent('resultsActive', {
        active: document.getElementById('app').classList.contains('active')
    })
    document.addEventListener('resultsActive', function(e) {
        if (process.e.active) {
            console.log('radi');
        }
        
    })

    document.dispatchEvent(resultsPageActive) */



    function doEverything(user) {
        UICtrl.fillResults(dataCtrl, input);
        
        UICtrl.slideBMIArrow(dataCtrl, input);
    }
    // Listen for the event.
    document.addEventListener('resultActive', function (e) { 
        
        doEverything(userInfo);
         

    }, false);


    //******* ILI napravi da event listener bude samo na dugmicima za next i fancy-radio pa u callbacku rokaj if statemente u slucaju da je single odgovor ili checkbox */
    //'NEXT BUTTON' click event listener
    document.addEventListener('click', ctrlBtnHandler)

    // next button listener

    //'BACK BUTTON' click event listener
    document.querySelector('.btn-back-step').addEventListener('click', function () {

        // 1. delete current page input


        // 2. show previous page


        // 3. update current page state
    })

})(UIController, dataController)