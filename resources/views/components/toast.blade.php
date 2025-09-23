@if ($errors->any())
    <div id="toast" class="fixed top-5 right-5 bg-red-500 text-white px-4 py-3 rounded-lg shadow-lg z-50 animate-slide-in">
        <p class="font-semibold">Login Failed</p>
        <ul class="mt-1 text-sm list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div id="toast-success" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg z-50 animate-slide-in">
        <p class="font-semibold">Success</p>
        <p class="text-sm mt-1">{{ session('success') }}</p>
    </div>
@endif

<style>
    @keyframes slide-in {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    .animate-slide-in {
        animation: slide-in 0.4s ease-out;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toasts = document.querySelectorAll("#toast, #toast-success");
        toasts.forEach(toast => {
            setTimeout(() => {
                toast.style.transition = "opacity 0.5s ease";
                toast.style.opacity = "0";
                setTimeout(() => toast.remove(), 500);
            }, 4000);
        });
    });
</script>
