function show(){
    document.getElementById("price1").innerHTML="$800";
    var objdbConn = new ActiveXObject("ADODB.Connection");
    var strdsn = "Driver={SQL Server};SERVER=127.0.0.1;UID=root;PWD=xavier2012;DATABASE=a21dc585";
    objdbConn.Open(strdsn);
    var objrs = objdbConn.Execute("SELECT username FROM user ");


}
