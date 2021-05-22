var valpin= /^[0-9]+$/;
function val1(){
  var aid = document.getElementById("aid");
  var  loc= document.getElementById("loc");
  var street = document.getElementById("street");
  var mr = document.getElementById("mr");
  var city = document.getElementById("city");
  var sec = document.getElementById("sec");
  var pin = document.getElementById("pin");
  var state = document.getElementById("state");
  
  if (!aid.checkValidity() || !loc.checkValidity() ||!street.checkValidity() ||!mr.checkValidity() ||!city.checkValidity() ||!sec.checkValidity() ||!pin.checkValidity() ||!state.checkValidity()) {
    document.getElementById("demo").innerHTML = "Fill all the required fields";
    return false;
  } 
  else {
     // alert("h2");
    var valpin= /^[0-9]+$/;
    if(pin.value.match(valpin)){
        document.getElementById("demo").innerHTML = "correct PIN";
        console.log("h1");
        return true;
      alert("h2");
    }
    else{
        document.getElementById("demo").innerHTML = "Enter correct PIN";
        console.log("h2");
        return false;
      alert("h3");
    }
  } 
}

function val2(){
    alert("h1");
    console.log('cdm');
    
    var fid = document.getElementById("fid");
    var pid = document.getElementById("pid");
    var floorplanid = document.getElementById("planid");
    var lift = document.getElementById("lifts");
    var floor = document.getElementById("floors");
    var units = document.getElementById("units");

    if (!fid.checkValidity() || !pid.checkValidity() ||!floorplanid.checkValidity() ||!lift.checkValidity() ||!floor.checkValidity() ||!units.checkValidity()) {
        document.getElementById("demo1").innerHTML = "Fill all the required fields";
        return false;
    }
    else{
            if(!lift.value.match(valpin)){
                document.getElementById("demo1").innerHTML="Enter valid lift no";
                return false;
            }
            else if(!floor.value.match(valpin)){
                document.getElementById("demo1").innerHTML="Enter valid no of floors";
                return false;
            }
            else if(!units.value.match(valpin)){
                document.getElementById("demo1").innerHTML="Enter valid no of units";
                return false;
            }
            else{
                return true;
            }
    }
}