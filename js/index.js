
//DATA controller
var dataController = (function () {

    //calculate keto plan
    function calculateKeto(userData) {
        var input = {
            units: {},
            excludeMeat: [],
            excludeOthers: [],
            workoutType: null,
            weightGoal: null
        }
        function calcBMR() {

            var BMR = (10 * userData.units.weight) + (6.25 * userData.units.height) - (5 * userData.units.age) + 5;

            return BMR;

        };

        function calcIntensity() {

            return userData.workoutType;

        };

        function calcObjective() {

            if (userData.weightGoal === '1') {
                return ((userData.calcBMR() * userData.calcIntensity()) / 100) * 20;
            }

            if (userData.weightGoal === '2') {
                return 0;
            }

            if (userData.weightGoal === '3') {
                return ((userData.calcBMR() * userData.calcIntensity()) / 100) * 10;
            }
        }


        function getCalorieIntake(obj) {

            if (obj.pol === 'muski') {

                return (obj.calcBMR() * obj.calcIntensity()) - obj.calcObjective();

            }

            if (obj.pol === 'zenski') {
                return (((10 * obj.tezina) + (6.25 * obj.visina) - (5 * obj.godine) - 161) * obj.intenzitet_treninga) / 10 * obj.weightGoal;
            }
        }
    }


})();



//UI controller
var UIController = (function () {

    //add active class to selected sex button 
    function addActive(event, state) {
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
        var emptyField;
        var errorMsgContainer = state.activePage().querySelector('.error-msg');

        for (var i = allInputFields.length - 1; i >= 0; i--) {

            if (allInputFields[i].value == '') {
                emptyField = allInputFields[i].dataset.input_question;
                allInputFields[i].focus();
                errorMsgContainer.innerHTML = `Morate popuniti polje ${emptyField}`;
                errorMsgContainer.style.display = 'block';
            } 
        }
        
        if (emptyField === undefined) {
            errorMsgContainer.style.display = 'none';
            return true
        } else return false;

    }

    //hide current page
    function hideCurrentPage(state) {
        var currentPage = state.activePage(); //get current active page

        //remove active class fromcurrent page
        currentPage.classList.remove('active');

    }

    //show next page
    function showNextPage(state) {

        //add active class to next page
        document.querySelector(`#step-${(state.currentPageNum + 1)}`).classList.add('active');

        //update current page number
        state.currentPageNum++;
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

        var units = {},
            excludeMeat = [],
            excludeOthers = [],
            workoutType = null,
            weightGoal = null;


        // 1. IF ACTIVE PAGE HAS INPUT FIELDS

        // if active page has input fields
        if (answerType === 'input') {

            //NodeList of all input fields
            var allInputFields = document.querySelectorAll('#step-1 > .input-holder > input');

            //iterate input fields and add to inputObj
            for (let input of allInputFields) {

                units[`${input.dataset.input_question}`] = `${input.value}`;

            }
            return units
        }


        // 2. IF ACTIVE PAGE INPUT IS RADIO BUTTONS

        // if there is multiple answers to check (there is a next button)
        if (answerType === 'multiple') {

            var questionType = stateObj.questionType(); //currentQuestionType
            var allCheckedAnswers = document.querySelectorAll(`#step-${stateObj.currentPageNum} > .fancy-checkbox-holder > .checked`); //NodeList of all checked answers


            if (questionType === 'excludeMeat') {
                //add checked answers to inputObj
                for (let checkedAnswer of allCheckedAnswers) {
                    excludeMeat.push(checkedAnswer.dataset.answer);

                    if (excludeMeat.includes(checkedAnswer)) {

                        excludeMeat.filter(answer => {
                            return answer == checkedAnswer.dataset.answer;
                        })
                    }
                }
                return excludeMeat;
            }

            if (questionType === 'excludeOthers') {
                //add checked answers to inputObj
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
        validateInput
        /* updateCurrentPageState, */
        /* activePage */
    }

})();



//Global app controller
var controller = (function (UICtrl, dataCtrl) {

    //user input object
    var input = {
        units: {},
        excludeMeat: [],
        excludeOthers: [],
        workoutType: null,
        weightGoal: null
    }

    //app state
    var state = {
        activePage: function () {
            return document.querySelector('.active');
        },
        activePageChildren: function () {
            return document.querySelector('.active').children;
        },
        answerType: function () {
            return document.querySelector('.active').dataset.answer_type;
        },
        questionType: function () {
            return document.querySelector('.active').dataset.question_type;
        },
        questionMode: function () {
            return document.querySelector('.active').dataset.mode;
        },
        currentPageNum: 1
    }

    //keto calculation
    var ketoPlan = {};


    //next button handler
    var ctrlBtnHandler = function (event) {

        //male-female button handler
        if (state.questionType() === 'units' && event.target.dataset.sex) {
            UICtrl.addActive(event, state);
        }



        //if final question is answered - send data to php script
        if (state.activePage().dataset.mode === 'final-question' && event.target.dataset.btn === 'single') {

            //calculate nutrition needs of user
            ketoPlan = dataCtrl.calculateKeto(input);



            /* fetch('proracun/proracun.php', {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(input),
            })
            .then((response) => {
                response.json();
            })
            .then((data) => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            }); */

        }



        //if next button
        if (event.target.dataset.btn === 'next') {
            if (UICtrl.validateInput(state) === true) {
                // 1. store user input
                input[`${state.questionType()}`] = UICtrl.currentPageInput(event, state, input);

                // 3. hide current page
                UICtrl.hideCurrentPage(state);

                // 4. show next next page
                UICtrl.showNextPage(state);

                /* // 5. update current page state
                UICtrl.updateCurrentPageState(state) */
            }



        }

        //if multiple answers fancy-radio button is clicked
        if (event.target.dataset.btn === 'check') {

            // 1. get user input
            event.target.classList.toggle('checked');

            // 2. toggle checked class to clicket button
            input[`${state.questionType()}`] = UICtrl.currentPageInput(event, state, input);

        }

        // if single answer fancy-radio button is clicked
        if (event.target.dataset.btn === 'single' && state.questionMode() !== 'final-question') {

            // 1. store user input
            input[`${state.questionType()}`] = UICtrl.currentPageInput(event, state, input);

            // 3. hide current page
            UICtrl.hideCurrentPage(state);

            // 4. show next next page
            UICtrl.showNextPage(state);

            /* // 5. update current page state
            UICtrl.updateCurrentPageState(state) */

        }

        //if back button is clicked
        if (event.target.dataset.btn === 'back') {

            //delete stored answers from current page
            input[`${state.questionType()}`] = null;

            //if returning to first page hide error message

            // 1. hide current page
            UICtrl.hideCurrentPage(state);

            // 2. show previous page
            UICtrl.showPreviousPage(state);

        }

    }

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