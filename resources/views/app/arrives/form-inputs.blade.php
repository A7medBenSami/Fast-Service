@php $editing = isset($arrive) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($arrive->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $arrive->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="captain_id" label="Captain" required>
            @php $selected = old('captain_id', ($editing ? $arrive->captain_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Captain</option>
            @foreach($captains as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="from_at"
            label="From At"
            :value="old('from_at', ($editing ? $arrive->from_at : ''))"
            max="255"
            step="0.01"
            placeholder="From At"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="from_long"
            label="From Long"
            :value="old('from_long', ($editing ? $arrive->from_long : ''))"
            max="255"
            step="0.01"
            placeholder="From Long"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="to_lat"
            label="To Lat"
            :value="old('to_lat', ($editing ? $arrive->to_lat : ''))"
            max="255"
            step="0.01"
            placeholder="To Lat"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="to_long"
            label="To Long"
            :value="old('to_long', ($editing ? $arrive->to_long : ''))"
            max="255"
            step="0.01"
            placeholder="To Long"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="note" label="Note" maxlength="255"
            >{{ old('note', ($editing ? $arrive->note : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="cost"
            label="Cost"
            :value="old('cost', ($editing ? $arrive->cost : ''))"
            max="255"
            step="0.01"
            placeholder="Cost"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="status" label="Status">
            @php $selected = old('status', ($editing ? $arrive->status : '')) @endphp
            <option value="upcoming" {{ $selected == 'upcoming' ? 'selected' : '' }} >Upcoming</option>
            <option value="completed" {{ $selected == 'completed' ? 'selected' : '' }} >Completed</option>
            <option value="cancelled" {{ $selected == 'cancelled' ? 'selected' : '' }} >Cancelled</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="vehicle_id" label="Vehicle" required>
            @php $selected = old('vehicle_id', ($editing ? $arrive->vehicle_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Vehicle</option>
            @foreach($vehicles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="address"
            label="Address"
            :value="old('address', ($editing ? $arrive->address : ''))"
            maxlength="255"
            placeholder="Address"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="location_id" label="Location" required>
            @php $selected = old('location_id', ($editing ? $arrive->location_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Location</option>
            @foreach($locations as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="address_id" label="Address">
            @php $selected = old('address_id', ($editing ? $arrive->address_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Address</option>
            @foreach($addresses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
