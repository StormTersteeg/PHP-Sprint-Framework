<title>Home</title>
<div style="display:flex;justify-content:center;align-items:center;height:100%;">
    <div class="card">
        <div class="card-body">
            <blockquote class="blockquote">
                <p class="mb-0">Hello World.</p>
                <footer class="blockquote-footer"><cite title="Source Title"></cite>You</footer>
            </blockquote>
        </div>
    </div>

    <div class="card ml-5">
        <div class="card-body">
            <h5>Try the default controller by posting this form.</h5>
            <button type="submit" class="btn btn-primary" onclick="getTest()">Submit</button>
            <hr class="my-4">
            <h5>Click here to view the $page / $sub_page example</h5>
            <a href="product/foo">Product: foo</a><br>
            <a href="product/bar">Product: bar</a>
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