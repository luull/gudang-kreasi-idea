<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="{{ asset('admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var funcNum = "<?php echo $_GET['CKEditorFuncNum']; ?>"
        $(".img-thumbnail").click(function() {
            var fl = $(this).attr('src')

            window.opener.CKEDITOR.tools.callFunction(funcNum, fl);
            window.close();
        })
    })
</script>

<h5 class="text-center">Direktori <span class="text-danger">{{ $r_path }}</span></h5>
<div class='row justify-content-center'>
    <?php $x = 0; ?>
    @foreach ($files as $filename)
        @if ($filename != '.' && $filename != '..' && $filename != '.DS_Store')
            <?php $x++; ?>
            <div class="col-md-4 col-lg-4 col-sm-6 text-center p-2">
                <img src="{{ asset($r_path . '/' . $filename) }}" class="img-thumbnail" id="{{ $x }}"
                    alt="{{ $filename }}">
                <div class="text-center" id="fl-{{ $x }}">{{ $filename }}</div>
            </div>
        @endif
    @endforeach
</div>
