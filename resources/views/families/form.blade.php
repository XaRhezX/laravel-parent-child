@if ($action == 'create')
    <form class="card card-md" action="{{ route('families.store') }}" method="POST" autocomplete="off">
    @elseif($action == 'edit')
        <form class="card card-md" action="{{ route('families.update', $family->id) }}" method="POST">
            @method('PUT')
        @else
            <form class="card card-md">
@endif

@csrf
<div class="card-body">
    <div class="mb-3">
        <label class="form-label">{{ __('Name') }}</label>
        <input type="text" name="name" value="{{ $family->name ?? '' }}"
            class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}"
            @if ($action == 'view') readonly @endif>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">{{ __('Gender') }}</label>
        <input type="radio" name="gender" value="Male" class="form-radio @error('gender') is-invalid @enderror"
            @if ($action == 'view') readonly @endif {{ $family->gender == 'Male' ? 'checked' : '' }}> Male
        <input type="radio" name="gender" value="Female" class="form-radio @error('gender') is-invalid @enderror"
            @if ($action == 'view') readonly @endif {{ $family->gender == 'Female' ? 'checked' : '' }}>
        Female

        @error('gender')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">{{ __('Parent') }}</label>
        <select name="family_id" type="text" class="form-control select2" id="family_id"
            @if ($action == 'view') disabled @endif>
            @if (!empty($family->family_id))
                <option value="{{ $family->family_id }}" selected>{{ $family->Parent->name }}</option>
            @endif
        </select>
        @error('family_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>



    @if ($action != 'view')
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">{{ __('Submit') }}</button>
        </div>
    @endif
</div>
</form>


@push('scripts')
    <script type="text/javascript">
        $('#family_id').select2({
            placeholder: 'Select Parent',
            ajax: {
                url: '/api/families',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data.data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endpush
