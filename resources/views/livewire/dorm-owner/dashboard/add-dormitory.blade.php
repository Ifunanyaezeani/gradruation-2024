<div class="container vstack gap-4">
    <!-- Title START -->
    <div class="row">
        <div class="col-12">
            <h1 class="fs-4 mb-0"><i class="bi bi-plus-circle-dotted fa-fw me-1"></i>Add New Dormitory</h1>
        </div>
    </div>
    <!-- Title END -->

    <!-- Tabs Content START -->
    <div class="row g-4">
        <div class="col-12">
            <div class="card border">
                <div class="card-header border-bottom">
                    <h5 class="card-header-title">Enter Dormitory Details</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent='save'>
                        <div class="row">
                            <!-- Full name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dorm Name</label>
                                <input type="text" class="form-control @error('dormName') is-invalid @enderror" placeholder="Name" wire:model='dormName'>
                                 @error('dormName') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
                            </div>
                            <!-- Dorm type -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">type</label>
                                <select wire:model='dormType' class="form-control @error('dormType') is-invalid @enderror">
                                    <option value="">-- select dorm type --</option>
                                    @foreach (App\Enums\DormType::cases() as $case)
                                        <option value="{{ $case->name }}">{{ Str::ucfirst($case->value) }}</option>
                                    @endforeach
                                </select>
                                 @error('dormType') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
                            </div>
                        </div>

                        <div class="row mt-4">
                            <!-- Dorm region -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Region</label>
                                <input type="text" wire:model='region' class="form-control @error('region') is-invalid @enderror" placeholder="e.g Marmara">
                                @error('region') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
                            </div>
                            <!-- Dorm city -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" wire:model='city' class="form-control @error('city') is-invalid @enderror" placeholder="e.g Istanbul">
                                @error('city') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
                            </div>
                        </div>

                        <div class="mb-3 mt-4">
                            <label class="form-label">Street Address</label>
                            <textarea wire:model='address' class="form-control @error('address') is-invalid @enderror"></textarea>
                            @error('address') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
                        </div>

                        <div class="mb-3 mt-4">
                            <label class="form-label">Dormitory description</label>
                            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
                        </div>

                        <div class="mb-3 mt-4">
                            <label class="form-label">Dormitory policy</label>
                            <textarea wire:model="policy" class="form-control @error('policy') is-invalid @enderror"></textarea>
                                @error('policy') <span class="invalid-feedback position-absolute"><small><i>{{ $message }}</i></small></span> @enderror
                        </div>

                        <!-- Dorm picture -->
                        <div class="mb-3 mt-4">
                            <label class="form-label">Dorm Picture</label>
                            <div class="d-flex align-items-center">
                                @if ($dormPicture)
                                    <label class="position-relative me-4" for="uploadfile-1" title="dorm image">
                                        <span class="avatar avatar-xxxl">
                                            <img id="uploadfile-1-preview"
                                                class="avatar-img rounded border border-white border-3 shadow"
                                                src="{{ $dormPicture->temporaryUrl() }}" alt="">
                                        </span>
                                    </label>
                                @endif

                                <!-- Upload button -->
                                <label class="btn btn-sm btn-primary-soft mb-0" for="uploadfile-1">Upload Picture</label>
                                <input id="uploadfile-1" class="form-control d-none @error('dormPicture') is-invalid @enderror" wire:model='dormPicture'
                                    type="file">
                                    @error('dormPicture') <br><span class="invalid-feedback"><small><i>{{ $message }}</i></small></span> @enderror
                            </div>
                        </div>

                        <!-- Save button -->
                        <div class="d-flex justify-content-end mt-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary mb-0 mt-2" wire:loading.attr="disabled">
                                    <span wire:loading.remove>Save</span>
                                    <span wire:loading wire:target="save" class="text-center">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        <span class="visually-hidden">Loading...</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Tabs Content END -->

    <script>
        const description = new Quill('#description', {
            theme: 'snow'
        });
        const policy = new Quill('#policy', {
            theme: 'snow'
        });

        description.on('text-change', () => {
            @this.set('content', description.root.innerHTML);
            @this.set('policy', )
        });

        policy.on('text-change', () => {
            @this.set('content', policy.root.innerHTML);
            @this.set('policy', )
        });
    </script>


</div>
