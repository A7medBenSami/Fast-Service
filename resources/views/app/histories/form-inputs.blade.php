@php $editing = isset($history) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($history->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="vehicle"
            label="Vehicle"
            :value="old('vehicle', ($editing ? $history->vehicle : ''))"
            maxlength="255"
            placeholder="Vehicle"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="user_id"
            label="User Id"
            :value="old('user_id', ($editing ? $history->user_id : ''))"
            maxlength="255"
            placeholder="User Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="captain_id"
            label="Captain Id"
            :value="old('captain_id', ($editing ? $history->captain_id : ''))"
            maxlength="255"
            placeholder="Captain Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="from_lat"
            label="From Lat"
            :value="old('from_lat', ($editing ? $history->from_lat : ''))"
            maxlength="255"
            placeholder="From Lat"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="from_long"
            label="From Long"
            :value="old('from_long', ($editing ? $history->from_long : ''))"
            maxlength="255"
            placeholder="From Long"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="to_lat"
            label="To Lat"
            :value="old('to_lat', ($editing ? $history->to_lat : ''))"
            maxlength="255"
            placeholder="To Lat"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="to_long"
            label="To Long"
            :value="old('to_long', ($editing ? $history->to_long : ''))"
            maxlength="255"
            placeholder="To Long"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="status"
            label="Status"
            :value="old('status', ($editing ? $history->status : ''))"
            maxlength="255"
            placeholder="Status"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
