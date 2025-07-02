@if (session('success'))
    <div class="alert alert-any max-w-xl mx-auto mb-6">
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg flex items-center justify-between shadow-md">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4.414l5.707-5.707-1.414-1.414L9 11.172l-2.293-2.293-1.414 1.414L9 13.586z"
                        clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-green-700 hover:text-green-900">
                &times;
            </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-any max-w-xl mx-auto mb-6">
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg flex items-center justify-between shadow-md">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10A8 8 0 11. . ."
                        clip-rule="evenodd" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-red-700 hover:text-red-900">
                &times;
            </button>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-any max-w-xl mx-auto mb-6">
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg shadow-md">
            <p class="font-semibold mb-2 flex items-center">
                <svg class="w-5 h-5 text-red-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293L7.293 8.707 8.586 10l-1.293 1.293 1.414 1.414L10 11.414l1.293 1.293 1.414-1.414L11.414 10l1.293-1.293-1.414-1.414L10 8.586 8.707 7.293z"
                          clip-rule="evenodd" />
                </svg>
                Please fix the following errors:
            </p>
            <ul class="list-disc list-inside text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<script>
    // Auto-dismiss the alert after 5 seconds
    setTimeout(() => {
        document.querySelector('.alert-any').style.display = 'none';
    }, 5000); // 5000 milliseconds = 5 seconds
</script>
