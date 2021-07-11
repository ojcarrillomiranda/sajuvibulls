var state = false;

  function ojo(){
    if (state) {
      document.getElementById("clave").setAttribute("type","password");
      document.getElementById("ojo").style.color='#7a797e';
      state = false;
  }
  else{
    document.getElementById("clave").setAttribute("type","text");
    document.getElementById("ojo").style.color='#5887ef';
      state = true;
  }
}


