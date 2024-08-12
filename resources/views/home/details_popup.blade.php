<div class="popup" id="popup" style="">
    <h2>Details to be filled</h2>
    <a class="btn btn-primary" href="" onclick="closePopup()">Borrow</a>
</div>

<script>
    function openPopup() {
        document.getElementById("popup").classList.add("open-popup");
        document.getElementById("popup").classList.remove("close-popup");
    }
    
    function closePopup() {
        document.getElementById("popup").classList.add("close-popup");
        document.getElementById("popup").classList.remove("open-popup");
    }
    </script>
    