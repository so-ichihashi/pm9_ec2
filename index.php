<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GoTo Travel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <style type="text/css">
        #body {
            background-image: url(images/button.jpg);
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/random.js"></script>
    <script src="js/addImage.js"></script>
</head>

<body id="body">
    <div class="container-fluid">
        <h1 class="title">GoTo</h1>
        <p>
            <button id="change" onclick="onClick()">
                <img src="images/airplane.png" alt="" />
            </button>
        </p>
        <p id="result">Travel</p>
    </div>
    <div class="db_area">
        <h2 class="db_title">List of Places</h2>
        <div id="places_list"></div>
    </div>
</body>
</html>

<div id="imageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title"></h3>
            </div>
            <div class="modal-body">
                <form id="image_form" method="post" enctype="multipart/form-data">
                    <p><label>画像を選択してください</label></p>
                    <input type="file" name="image" id="image" />
                    <input type="hidden" name="action" id="action" value="insert" />
                    <input type="hidden" name="image_id" id="image_id" />
                    <input type="submit" name="insert" id="insert" value="登録" class="btn btn-info" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
