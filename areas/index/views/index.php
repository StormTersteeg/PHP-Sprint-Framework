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
            <h5 class="mb-0">Try the default controller by posting this form.</h5>
            <form action="controller" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="value" placeholder="write anything">
                    <input type="hidden" class="form-control" name="request" value="test">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>