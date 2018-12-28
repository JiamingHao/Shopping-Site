<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CKFinder 3</title>
<script src="./ckfinder/ckfinder.js"></script>
</head>
<body>
<script>
function openPopup() {
    CKFinder.popup( {
        chooseFiles: true,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                document.getElementById( 'url' ).value = file.getUrl();
            } );
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    document.getElementById( 'url' ).value = evt.data.resizedUrl;
                } );
        }
    } );
}

function getURL()
{
	console.log(document.getElementById("url").value);
}
</script>
<input type="text" size="2" name="url" id="url" /> 
<button onclick="openPopup()">Select file</button>
<button onclick="getURL()">Comfirm</button>
<P align=center><BR></P>
<P align=center>
<MARQUEE style="WIDTH: 500px; HEIGHT: 100px" scrollAmount=5 direction=right>
<P align=center><FONT color=#ff0000 size=7><B>Hello!</B></FONT></P></MARQUEE></P>
</body>
</html>