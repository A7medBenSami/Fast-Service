@php $editing = isset($ourData) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="about_us"
            label="About Us"
            maxlength="255"
            required
            >{{ old('about_us', ($editing ? $ourData->about_us : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="privacy_policy"
            label="Privacy Policy"
            maxlength="255"
            required
            >{{ old('privacy_policy', ($editing ? $ourData->privacy_policy :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="address"
            label="Address"
            :value="old('address', ($editing ? $ourData->address : ''))"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $ourData->phone : ''))"
            maxlength="255"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $ourData->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="help_and_support"
            label="Help And Support"
            maxlength="255"
            required
            >{{ old('help_and_support', ($editing ? $ourData->help_and_support :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
