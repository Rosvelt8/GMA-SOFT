<script>
    let heure= new Date();
    let hour= heure.getHours();
    let minute=heure.getMinutes();
    let second= heure.getSeconds();

    if (hour < 10){
        hour= "0" + hour;
    }
    if (second < 10){
        second= "0" + second;
    }
    if (minute < 10){
        minute= "0" + minute;
    }
    document.getElementById("hour").innerHTML= hour + ":" + minute;
</script>
<script src="../assets/js/dark_dash.js"></script>
</body>
</html>