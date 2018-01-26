//Keep track of button pressed
var timesClicked = 0;
function addFunction(test){
  timesClicked ++;
  document.getElementById('test').innerHTML = timesClicked;
  return true;
}

var timesClicked2=0;
function oneClick(){
  if(timesClicked2 <= 0){
    timesClicked2++;
    document.getElementById('Like').innerHTML = timesClicked2;
    return true;
  } else {
    document.getElementById("likeBTN").disabled = true;
  }
}

//you can do this new Date().getDay();

/* Time Algorithm
var lastTime = 0;

if ( Math.floor((new Date() - lastTime)/60000) < 2 ) {
  // get from variable
} else {
  // get from url
  lastTime =  new Date();
}
 */
