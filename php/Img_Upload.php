<?php

$connect = new PDO("mysql:host=localhost;dbname=goToTravel;charset=utf8;", 'ec2-user', 'PCPytI.+X8xd' );
if(!$connect){
    echo "データベースに接続できません";
}

if( isset($_POST["action"]) )
{
    //問い合わせ　一覧表示
    if($_POST["action"] == "Display"){
        $output = '
            <table class="table table-bordered table-striped table-sm ">
                <tr>
                    <th width="10%" class="text-center">ID</th>
                    <th width="20%">destination</th>
                    <th width="25%">created_at</th>
                    <th width="25%">image</th>
                    <th width="20%">Add an Image</th>
                </tr>
        ';
        $sql = "select * from destination order by id DESC LIMIT 10";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $path = '../images/';
            $output .= '
                <tr>
                    <td class="text-center">'.$row["id"].'</td>
                    <td class="text-left">'.$row["destination"].'</td>
                    <td class="text-left">'.$row["created_at"].'</td>
                    <td>
                        <img src="data:image/png;base64,'.base64_encode(file_get_contents("../images/".$row['img_name'])).'" class="img-thumbnail" style="width:120px;height:auto">
                    </td>
                    <td class="text-center"><button type="button" name="update" class="btn btn-primary bt-xs update" id="'.$row["id"].'">Add</button></td>
                </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }
    //ここまで問い合わせ　一覧表示

    //追加
    if($_POST["action"] == "update"){
        $uploaddir = '../images/';
        $uploadfile = $uploaddir . ($_FILES['image']['name']);
        $file = $_FILES["image"]["name"];
        $sql = 'UPDATE destination SET img_name=:name WHERE id=:id';
        $prepare = $connect->prepare($sql);
        $prepare->bindValue(':name', $file, PDO::PARAM_STR);
        $prepare->bindValue(':id', $_POST["image_id"], PDO::PARAM_INT);
        if( $prepare->execute() and move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile) ){
            echo "画像".$file."を登録しました";
        }else{
            echo "画像".$file."を登録できませんでした";
        }
    }
}
?>
