<?php include 'header.php'; ?>
<div class="card p-4 shadow-sm mb-4">
    <h3>Live Search Services</h3>
    <input type="text" id="keyword" class="form-control mt-3" placeholder="Start typing service name..." onkeyup="searchAjax()">
</div>

<div id="results" class="row"></div>

<script>
function searchAjax() {
    let q = document.getElementById("keyword").value;
    if (q == "") { document.getElementById("results").innerHTML = ""; return; }
    
    fetch("fetch_results.php?q=" + q)
    .then(response => response.text())
    .then(data => {
        document.getElementById("results").innerHTML = data;
    });
}
</script>