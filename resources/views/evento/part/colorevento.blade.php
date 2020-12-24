<script>
    function colorEvento(color){
        if (color) {
            if (document.getElementById("allDay").checked) {
                document.getElementById("evento-ejemplo").style.borderColor = color;
                document.getElementById("evento-ejemplo").style.backgroundColor = color;
                document.getElementById("evento-ejemplo").style.color = 'white';

                document.getElementById('borderColor').value = color;
                document.getElementById('backgroundColor').value = color;
                document.getElementById('textColor').value = 'white';
            }
            else {
                document.getElementById("evento-ejemplo").style.borderColor = color;
                document.getElementById("evento-ejemplo").style.backgroundColor = 'white';
                document.getElementById("evento-ejemplo").style.color = color;

                document.getElementById('borderColor').value = color;
                document.getElementById('backgroundColor').value = 'white';
                document.getElementById('textColor').value = color;
            }
        } else {
            color = document.getElementById("evento-ejemplo").style.borderColor;
            colorEvento(color);
        }
    }


</script>
