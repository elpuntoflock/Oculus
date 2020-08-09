<!-- DateTimePicker -->
<script src="{{ asset('js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Date Picker -->
<script>
    $('#datepicker').datetimepicker({
        format: 'DD-MM-YYYY',
    });

    $( function() {	
        $( "#slider" ).slider({
            range: "min",
            max: 100,
            value: 40,
        });
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ]
        });
    } );
</script>