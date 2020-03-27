//get url query strings 
function queryStrings() {

  var url = window.location.search;
  var queryParams = new URLSearchParams(url);

  var id = queryParams.get('id');
  var dan = queryParams.get('dan');

  return {
    id: id,
    dan: dan
  }

}


//send url query strings to php handler file
function sendQueryToHandler(queryStrings) {

  return fetch('../php/daily_plan.php', {
    method: 'post',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify(queryStrings)
  })

}


//get responce data from php handler file
function getResponceFromHandler(sendQueryToHandler) {
  console.log('radi');
  sendQueryToHandler(queryStrings())
    .then(responce => {
      return responce.json();
    })
    .then(data => {
      // data expected to be daily meal data in json format and user data
      // example:
      // object.dorucak.text
      // object.dorucak.sastojci
      // object.dorucak.nutritivnaVrednost
      // object.dorucak.
      console.log(data);


      document.querySelector('.dorucak').innerHTML = data.ime + ' ' + data.email;
    })
    .catch(err => {
      // Do something for an error here
      console.log("Error Reading data " + err);
    });

}
getResponceFromHandler(sendQueryToHandler);

//display responce from php handler file