<html lang="en">

<head>
  <title>Laravel 5 - Dynamic autocomplete search using select2 JS Ajax</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/css/select2/select2.min.css" rel="stylesheet" />
  <script src="/js/select2/select2.min.js"></script>
</head>

<body>

<div class="container">

    <h2>Laravel 5 - Dynamic autocomplete search using select2 JS Ajax</h2>
    <br/>
    <!--<select class="itemName form-control" style="width:500px;" name="itemName"></select>-->
    <select name="tags[]" class="form-control" multiple="multiple" id="tags"></select>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        // inicializamos el plugin
        $('#tags').select2({
            // Activamos la opcion "Tags" del plugin
            tags: true,
            tokenSeparators: [','],
            ajax: {
                dataType: 'json',
                url: '{{ url("select2-autocomplete-ajax") }}',
                delay: 250,
                processResults: function (data, page) {
                  return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.nombre,
                            id: item.id
                        }
                    })
                
                    };
                },
            }
        });
    });
</script>

<!--<script type="text/javascript">

      $('.itemName').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '/select2-autocomplete-ajax',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.nombre,
                        id: item.id
                    }
                })
                
            };
          },
          cache: true
        }
      });

</script>-->

</body>
</html>