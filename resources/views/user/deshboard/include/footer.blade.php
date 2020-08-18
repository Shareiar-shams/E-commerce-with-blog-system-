
<footer class="footer mt-auto">
    <div class="copyright bg-white">
      <p>
        &copy; <span id="copy-year"> &copy;<script>document.write(new Date().getFullYear());</script></span> Copyright 
        <a
          class="text-primary"
          href="{{URL::to('/')}}"
          target="_blank"
          >Karimcommerce</a
        >.  All rights reserved by.
      </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
</footer>