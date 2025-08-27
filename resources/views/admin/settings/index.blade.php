@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="container mx-auto px-6 py-6">
    <h1 class="text-3xl font-bold mb-6">Store Settings</h1>

    <!-- Tabs -->
    <div class="border-b border-gray-200 dark:border-gray-700 mb-6">
        <nav class="flex gap-6" aria-label="Tabs">
            <button class="tab-link text-blue-600 border-b-2 border-blue-600 py-2 px-1 text-sm font-medium"
                data-tab="general">General</button>
            <button class="tab-link text-gray-600 hover:text-blue-600 py-2 px-1 text-sm font-medium"
                data-tab="payment">Payments</button>
            <button class="tab-link text-gray-600 hover:text-blue-600 py-2 px-1 text-sm font-medium"
                data-tab="shipping">Shipping</button>
            <button class="tab-link text-gray-600 hover:text-blue-600 py-2 px-1 text-sm font-medium"
                data-tab="tax">Tax</button>
            <button class="tab-link text-gray-600 hover:text-blue-600 py-2 px-1 text-sm font-medium"
                data-tab="notifications">Notifications</button>
            <button class="tab-link text-gray-600 hover:text-blue-600 py-2 px-1 text-sm font-medium"
                data-tab="appearance">Appearance</button>
        </nav>
    </div>

    <!-- Tabs Content -->
    <div id="tab-contents">
        <!-- General -->
        <div id="general" class="tab-content">
            <form action="{{ route('admin.settings.update', 'general') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium">Store Name</label>
                    <input type="text" name="store_name" class="mt-1 block w-full border rounded-lg p-2"
                        value="{{ old('store_name', $settings['store_name'] ?? '') }}">
                </div>

                <div>
                    <label class="block text-sm font-medium">Store Email</label>
                    <input type="email" name="store_email" class="mt-1 block w-full border rounded-lg p-2"
                        value="{{ old('store_email', $settings['store_email'] ?? '') }}">
                </div>

                <div>
                    <label class="block text-sm font-medium">Logo</label>
                    <input type="file" name="logo" class="mt-1 block w-full border rounded-lg p-2">
                    @if(!empty($settings['logo']))
                        <img src="{{ asset('storage/' . $settings['logo']) }}" class="h-16 mt-2">
                    @endif
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save</button>
            </form>
        </div>

        <!-- Payments -->
        <div id="payment" class="tab-content hidden">
            <form action="{{ route('admin.settings.update', 'payment') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium">Enable PayPal</label>
                    <input type="checkbox" name="paypal_enabled" value="1"
                        {{ old('paypal_enabled', $settings['paypal_enabled'] ?? false) ? 'checked' : '' }}>
                </div>
                <div>
                    <label class="block text-sm font-medium">PayPal API Key</label>
                    <input type="text" name="paypal_key" class="mt-1 block w-full border rounded-lg p-2"
                        value="{{ old('paypal_key', $settings['paypal_key'] ?? '') }}">
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save</button>
            </form>
        </div>

        <!-- Shipping -->
        <div id="shipping" class="tab-content hidden">
            <p class="text-gray-500">Shipping settings form goes here...</p>
        </div>

        <!-- Tax -->
        <div id="tax" class="tab-content hidden">
            <p class="text-gray-500">Tax settings form goes here...</p>
        </div>

        <!-- Notifications -->
        <div id="notifications" class="tab-content hidden">
            <p class="text-gray-500">Notification settings form goes here...</p>
        </div>

        <!-- Appearance -->
        <div id="appearance" class="tab-content hidden">
            <p class="text-gray-500">Appearance settings form goes here...</p>
        </div>
    </div>
</div>

<script>
    // Tab switching
    const tabs = document.querySelectorAll(".tab-link");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            tabs.forEach(t => t.classList.remove("text-blue-600", "border-b-2", "border-blue-600"));
            tab.classList.add("text-blue-600", "border-b-2", "border-blue-600");

            contents.forEach(c => c.classList.add("hidden"));
            document.getElementById(tab.dataset.tab).classList.remove("hidden");
        });
    });
</script>
@endsection
