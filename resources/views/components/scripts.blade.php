<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<script src="{{ asset('assets/js/dashboard5438.js')}}?v=1.2.0"></script>
<script src="{{ asset('assets/js/demo.min.js')}}"></script>

<script>

    document.getElementById('logout').addEventListener('click', () => {
        url = "{{url('/')}}/logout"
        console.log('{{csrf_token()}}')
        fetch(url,{
        method:'POST',
        credentials:'same-origin',
        headers:{
            "Content-Type":"application/json",
            "Accept":"application/json",
            "X-CSRF-TOKEN":"{{csrf_token()}}"
        },
        body: JSON.stringify({
            _token: "{{csrf_token()}}",
        }),

        }).then(res => {
        if(res.status == 200){
            location.reload();
        }else{
            alert('Server Error Occurred')
        }
        })
    })
</script>
