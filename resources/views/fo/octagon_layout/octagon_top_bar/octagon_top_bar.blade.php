<!-- ___Start Top Bar___ -->
<div class="top-bar">
    <div class="top-bar-head">
        <div class="search">
            <i class="pe-7s-search showSingle" id="1"></i>
            <p>what are you looking for?</p>
        </div>
        
        <div class="login-mail pull-right showSingle" id="2">
            <i class="pe-7s-user"></i>
        </div>
    </div>
    <!-- End Top Bar Head -->

    <!-- ___Start Top Bar Body___ -->
    <div class="top-bar-body">
        <div class="search-body targetDiv" id="div1">
            <p>What are you looking for?</p>
            <form id="buscador" name="test-form" method="POST" action="{{ url('/search') }}">
                {{csrf_field()}}
                <!--<input id="tags" type="text" class="form-control no-radius" placeholder="Search here |">-->
                <select name="tags[]" class="form-control no-radius" multiple="multiple" id="tags" style="width:100%;"></select>
                <button type="submit" value="Submit" class="btn btn-secondary btn-md">Submit</button>
            </form>
        </div>

        <!-- ___Start Top Bar Login Body___ -->
        <div class="user-body targetDiv" id="div2">
            <div class="row">
                <p>
                Would you like to change your role?
                <button type="button" class="btn btn-primary btn-lg" style="margin-left:30px;">Professor</button>
                <label>{{ $rol }}</label>
            </div>
        </div>
        <!-- End Top Bar Login Body -->

        <!-- ___Start Mail Body___ -->
        
        <!-- End Mail Body -->
    </div><!-- End Top Bar Body -->
</div><!-- ___Start Top Bar___ -->

@section('scripts')
<!-- Script para el Select2 -->
<script type="text/javascript">
    $(document).ready(function () {
        // inicializamos el plugin
        $('#tags').select2({
            createTag: function(params) {
                return undefined;
            },
            //placeholder: "Choose tags...",
            tags: true,
            tokenSeparators: [',', ' '],
            minimumInputLength: 2,

            ajax: {
                url: '{{ url("find") }}',
                dataType: 'json',
                data: function (params) {
                    return {
                      q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    });
</script>
@endsection