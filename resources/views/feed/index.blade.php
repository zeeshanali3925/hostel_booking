<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixed Content Feed</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Dynamic Content Feed</h1>

    <div id="feed-container">
        @include('feed.partials.feed-items')
    </div>

    <div id="loading" style="display: none;">Loading more...</div>

    <script>
        $(document).ready(function(){
            var page = 1;
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                    loadMoreData();
                }
            });

            function loadMoreData(){
                page++;
                $("#loading").show();
                $.ajax({
                    url: '?page=' + page,
                    type: "GET",
                    success: function(data) {
                        if (data.trim() === "") {
                            $("#loading").text("No more content.");
                        } else {
                            $("#feed-container").append(data);
                            $("#loading").hide();
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>
