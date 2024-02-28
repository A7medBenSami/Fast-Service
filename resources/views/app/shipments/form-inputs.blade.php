@php $editing = isset($shipment) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($shipment->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="captain_id" label="Captain" required>
            @php $selected = old('captain_id', ($editing ? $shipment->captain_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Captain</option>
            @foreach($captains as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $shipment->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="from_lat"
            label="From Lat"
            :value="old('from_lat', ($editing ? $shipment->from_lat : ''))"
            max="255"
            step="0.01"
            placeholder="From Lat"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="from_long"
            label="From Long"
            :value="old('from_long', ($editing ? $shipment->from_long : ''))"
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
            :value="old('to_lat', ($editing ? $shipment->to_lat : ''))"
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
            :value="old('to_long', ($editing ? $shipment->to_long : ''))"
            max="255"
            step="0.01"
            placeholder="To Long"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $shipment->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="cost"
            label="Cost"
            :value="old('cost', ($editing ? $shipment->cost : ''))"
            max="255"
            step="0.01"
            placeholder="Cost"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="status" label="Status">
            @php $selected = old('status', ($editing ? $shipment->status : '')) @endphp
            <option value="upcoming" {{ $selected == 'upcoming' ? 'selected' : '' }} >Upcoming</option>
            <option value="completed" {{ $selected == 'completed' ? 'selected' : '' }} >Completed</option>
            <option value="cancelled" {{ $selected == 'cancelled' ? 'selected' : '' }} >Cancelled</option>
            <option value="receive" {{ $selected == 'receive' ? 'selected' : '' }} >Receive</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="category_id" label="Category" required>
            @php $selected = old('category_id', ($editing ? $shipment->category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Category</option>
            @foreach($categories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="vehicle_id" label="Vehicle" required>
            @php $selected = old('vehicle_id', ($editing ? $shipment->vehicle_id : '')) @endphp
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
            :value="old('address', ($editing ? $shipment->address : ''))"
            maxlength="255"
            placeholder="Address"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="address_id" label="Address">
            @php $selected = old('address_id', ($editing ? $shipment->address_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Address</option>
            @foreach($addresses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="receiver_data_id" label="Receiver Data" required>
            @php $selected = old('receiver_data_id', ($editing ? $shipment->receiver_data_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Receiver Data</option>
            @foreach($allReceiverData as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="location_id" label="Location" required>
            @php $selected = old('location_id', ($editing ? $shipment->location_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Location</option>
            @foreach($locations as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="sender_data_id" label="Sender Data" required>
            @php $selected = old('sender_data_id', ($editing ? $shipment->sender_data_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Sender Data</option>
            @foreach($allSenderData as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
