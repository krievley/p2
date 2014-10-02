<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>p2 - CSCI E-15</title>
    <?php require 'generator.php'; ?>
    <link href="css/default.css" rel="stylesheet" />
    <link href="css/normalize.css" rel="stylesheet" />
    <script src="Scripts/jquery-2.1.1.js"></script>
    <script src="Scripts/default.js"></script>
    
</head>
<body>
    <div id="header">
        <div class="container">
            <h1><span class="title">XKCD </span>Password Generator</h1>
            <hr class="dotted"/>
        </div>
    </div>
    <div id="body">
        <div class="container">
            <form action="index.php" method="post">
                <h3>Password Specifications</h3>
                <div class="col1">
                    <div class="para">Number of words: <input name="words" type="number" min="1" max="9" required="required" /> (Max 9)</div>
                    <div class="para"><input name="num" type="checkbox" /> Add a Number</div>
                    <div class="para"><input name="symbol" id="sym" type="checkbox" /> Add a Symbol</div>
                    <div class="para" id="symNum">Number of symbols: <input name="symNum" type="number" min="1" max="3" /> (Max 3)</div>
                    <br />
                </div>
                <h3>Display Options</h3>
                <div class="col3">
                    <h4>Separate Words By:</h4>
                    <div class="input para">
                        <input type="radio" id="spaces" name="separation" value="spaces" checked="checked" />
                        <label for="spaces">Spaces</label>
                        <br />
                        <input type="radio" id="camelCase" name="separation" value="camelCase" />
                        <label for="camelCase">Camel Case</label>
                        <br />
                        <input type="radio" id="hyphens" name="separation" value="hyphens" />
                        <label for="hyphens">Hyphens</label>
                    </div>
                </div>
                <div class="col3">
                    <h4>Letters Should Appear:</h4>
                    <div class="input para">
                        <input type="radio" id="lower" name="letter" value="lower" checked="checked" />
                        <label for="lower">Lower Case</label>
                        <br />
                        <input type="radio" id="upper" name="letter" value="upper" />
                        <label for="upper">Upper Case</label>
                        <br />
                        <input type="radio" id="capital" name="letter" value="capital" />
                        <label for="capital">Capitalize 1st Letter</label>
                    </div>
                </div>
                <div id="pass" class="container">
                    <h2><?php echo $result?></h2>
                </div>
                <div class="container">
                    <button type="submit" name="submit">Generate Password</button>
                </div>
            </form>
        </div>
    </div>
    <div id="footer">
        
    </div>
</body>
</html>
