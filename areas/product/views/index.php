<?php
$site_name .= " - products";
$page_description = "All my sprint demo products!";
?>

<div style="display:flex;justify-content:center;align-items:center;height:100%;">
    <div class="card">
        <div class="card-body">
            <blockquote class="blockquote">
                <p class="mb-0"><?= $sub_page ?></p>
                <footer class="blockquote-footer"><cite title="Source Title">A parameter can be passed to views by using $sub_page</cite></footer>
            </blockquote>
        </div>
    </div>

    <div class="card ml-5">
        <div class="card-body">
            <a href="foo">Product: foo</a><br>
            <a href="bar">Product: bar</a><br>
            <a href="../">Return</a>
        </div>
    </div>
</div>

<script>
function getTest() {
  re = $.post("controller", {request: "getTest"}, function (result) {
    alert(result)
  })
}
</script>