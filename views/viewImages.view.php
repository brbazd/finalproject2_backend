<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<?php

foreach ($images as $image){
    if($lastImage[0] == $image->id){
        $lastImagePresent = true;
    } else {
        $lastImagePresent = false;
    }
}
?>

<div class="container">

    <h2>All Images</h2>

    <div class="elList">

            <?php foreach($images as $image){ ?>
                <div class="elContainer">
                    <div>
                        <div class="imgContainer">
                            <img src="http://localhost:8081/<?=$image->url ?>" alt class="imgContent">
                        </div>
                        <div class="imgInfo">
                            <h3><?=$image->title ?></h3>
                            <span class="desc"><?=$image->description ?></span>
                        </div>
                    </div>
                    <div>
                        <a href="/edit/image?id=<?=$image->id?>">Edit</a>
                        <a href="/delete/image?id=<?=$image->id?>" style="color:red;">Delete</a>
                    </div>
                </div>
            <?php } ?>
    
            <div class="pageSwitcher">

                <?php if($totalImgCount > 10){ ?>
                    <?php if($_GET['page'] != 1 || !isset($_GET['page'])){ ?>
                        <a href="/view/images?page=<?=$_GET['page']-1?>" class="pageBtnPrev">Previous</a>
                    <?php } ?>
                    <?php if($lastImagePresent == false) { ?>
                        <a href="/view/images?page=<?=$_GET['page']+1?>" class="pageBtnNext">Next</a>
                    <?php } ?>
                <?php } ?>
            </div>

    
    </div>

</div>



<?php require "partials/footer.php" ?>

<style>


    .elList {
        display: flex;
        flex-direction: column;
    }

    .elContainer {
        height: 200px;
        width: 1200px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #333;
    }

    .elContainer > div {
        display: flex;
        justify-content: space-between;
    }

    .imgInfo {
        margin: 10px;
    }

    .imgContainer {
        height: 160px;
        width: 240px;
        overflow: hidden;
    }

    .imgContent {
        width: 100%;
    }

    h3 {
        font-size: 28px;
        margin: 6px 0;
    }

    .desc {
        font-style: italic;
    }

    h2 {
        font-size: 42px;
        margin: 6px 0;
    }

    .pageSwitcher {
        margin-top: 10px;
    }

    .pageSwitcher a {
        text-decoration: none;
        color: #000;
        font-weight: 700;
        font-size: 20px;
    }

    .pageBtnPrev {
        display: flex;
        justify-content: flex-start;
    }

    .pageBtnNext {
        display: flex;
        justify-content: flex-end;
    }

</style>