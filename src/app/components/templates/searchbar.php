<?php
    function searchbar() {

?>
        <div id="searchbar">
            <form id="searchform" action="/home" method="get">
                <input type="text" id="searchtext" placeholder="Cari resep ..." spellcheck="false" />
                <button type="submit" id="searchsubmit"> 
                    <img id="searchsubmit_icon" src="<?php echo BASE_URL ?>/static/icon/search.svg" alt="search"/>
                </button>
            </form>
        </div>
<?php
    }
?>