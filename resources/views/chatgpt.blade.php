<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
        <?php //phpinfo();?>
        <div>
            <h1> Chat GPT </h1>
			<textarea id="input-textarea" rows="15" cols="200"></textarea><br>
				<button id="ai-assist-button">AI Assist</button><br>
			<textarea id="output-textarea" rows="20" cols="200"></textarea>
		</div>
    </body>
</html>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $(document).ready(function() {
		console.log("jQuery is working!");
	});
    $(function() {
        $("#ai-assist-button").click(function() {
            var inputText = $("#input-textarea").val();
            $.ajax({
                url: "/chatGptApi",
                type: "POST",
				cache: false,
                data: {inputText: inputText},
                success: function(response) {
                    // alert(response)
                    $("#output-textarea").val(response);
                }
            });
        });
    });
</script>

