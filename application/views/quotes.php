<!DOCTYPE html>
<html>
<head>
    <title>Quotes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style>
    body {
        margin-left: 60px;
        width: 980px;
    }
    .pull-right {
        margin-left: 40px;
    }
    .boxes {
        display: inline-block;
    }
    #float_right {
        margin-top: 36px;
        float: right;
        margin-right: 50px;
        display: inline-block;
    }
        #hover {
            position: absolute;
            top: 138px;
            margin-left: 10px;
            background-color: white;
        }
        #quote_box {
            overflow: scroll;
            width: 380px;
            height: 600px;
            border: 1px solid silver;
        }
        #fave_box {
            display: inline-block;
            overflow: scroll;
            width: 380px;
            height: 500px;
            border: 1px solid silver;
        }
        .quotes {
            margin: 0 auto;
            margin-top: 15px;
            margin-bottom: 15px;
            border: 1px solid silver;
            padding: 10px;
            width: 340px;
        }
            .left {
                display: block;
            }
            .right {
                position: relative;
                left: 220px;
            }
            .right2 {
                position: relative;
                left: 180px;
            }
    .add_box {
        border: 1px solid silver;
        display: inline-block;
        float: right;
        margin-right: 50px;
        padding: 15px;
        margin-bottom: 20px;
    }
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
  <?php $user=$this->session->userdata('user'); ?>
    <nav class="navbar navbar-default">
        <a href="/main/logout" class="pull-right"><h3>Logout</h3></a>
    </nav>
    <h2>Welcome, <?= $user['alias'] ?>!</h2>
    <div class="boxes">
        <h4>Quotable Quotes (Latest Quotes on Top)</h4>
        <div id="quote_box">
            <?php foreach ($quotes as $key => $value) { ?>
            <div class="quotes">
                <p><span style="font-weight:bold"><?= $value['author_quote'] ?></span>: <?= $value['quote'] ?> </p>
                <div class="left">
                    <h5>posted by (<?= $value['alias'] ?>) <?= $value['name'] ?></h5>
                </div>
                    <a class="right" href="/main/add_quote/<?= $value['id'] ?>" align="right" type="button">Add to My List</a>
            </div>
            <?php } ?>
        </div>
    </div>


    <div id="float_right">
        <h4 id="hover">Your Favorites</h4>
        <div id="fave_box">
            <?php foreach ($fave_quotes as $key => $value) { ?>
            <div class="quotes">
                <p><span style="font-weight:bold"><?= $value['author_quote'] ?></span>: <?= $value['quote'] ?> </p>
                <div class="left">
                    <h5>posted by (<?= $value['alias'] ?>) <?= $value['name'] ?></h5>
                </div>
                <a class="right2" href="/main/remove_quote/<?= $value['id'] ?>" align="right" type="button">Remove From My List</a>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="add_box">
        <form action="/main/new_quote" method="post">
            <h4>Contribute a Quote:</h4>
            <table>
                <tr>
                    <td>Quoted By:</td>
                    <td><input type="text" name="author_quote" style='width: 233px'></td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td>
                        <textarea name="quote" id="" cols="30" rows="10" style="resize: none"></textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Submit" align="right">
        </form>
    </div>
</body>
</html>