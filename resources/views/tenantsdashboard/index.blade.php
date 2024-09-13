<x-app-layout>
    <main class=" mt-4">
        <div >
            <div class="row">
                @foreach ($tenants as $tenant)
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title mb-2">{{ $tenant->name }}</h5>
                                <p class="card-text mb-3">Manage your {{ $tenant->name }}</p>
                                <a href="{{ route('superadmins.index', ['tenant' => $tenant->id]) }}" class="btn btn-light">Manage superadmins</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</x-app-layout>
