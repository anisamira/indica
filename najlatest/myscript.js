    $(document).ready(function() {
        $('#checkbox1').change(function() {
            if (this.checked)
                $('#autoUpdate').fadeIn('slow');
            else
                $('#autoUpdate').fadeOut('slow');

        });
    });