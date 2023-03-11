<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2021 News | Powered by <a href="#">News Blog</a></span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
<?php ob_end_flush(); ?>
<!-- CDN for Summernote -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote({
              placeholder: "About Post.....",
              tabsize: 2,
              height: 150  
            });

            
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
<!-- CDN for Summernote END -->

<script src="../css/script.js"></script>

</body>
</html>
