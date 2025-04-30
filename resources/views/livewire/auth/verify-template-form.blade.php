<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <form wire:submit.prevent='verify_email' id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="CustomerPassword">Enter Code</label>
                    <div class="flex gap-3">
                        <input type="text" maxlength="1"
                            class="w-12 h-12 text-center border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            wire:model.lazy="code_1" autocomplete="off" id="code_1"
                            oninput="moveFocus(event, 'code_1', 'code_2')">

                        <input type="text" maxlength="1"
                            class="w-12 h-12 text-center border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            wire:model.lazy="code_2" autocomplete="off" id="code_2"
                            oninput="moveFocus(event, 'code_2', 'code_3')">

                        <input type="text" maxlength="1"
                            class="w-12 h-12 text-center border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            wire:model.lazy="code_3" autocomplete="off" id="code_3"
                            oninput="moveFocus(event, 'code_3', 'code_4')">

                        <input type="text" maxlength="1"
                            class="w-12 h-12 text-center border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            wire:model.lazy="code_4" autocomplete="off" id="code_4"
                            oninput="moveFocus(event, 'code_4', 'code_5')">

                        <input type="text" maxlength="1"
                            class="w-12 h-12 text-center border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            wire:model.lazy="code_5" autocomplete="off" id="code_5"
                            oninput="moveFocus(event, 'code_5', 'code_6')">

                        <input type="text" maxlength="1"
                            class="w-12 h-12 text-center border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            wire:model.lazy="code_6" autocomplete="off" id="code_6">
                    </div>
                    @error('code')
                        <span class="text-danger mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                {{-- <input type="submit" class="btn mb-3" value="Sign In"> --}}
                <button type="submit" class="btn mb-3">
                    <span wire:loading.remove.delay>Verify</span>

                    <span wire:loading.delay>Loading...</span>
                </button>
                <p class="mb-4">
                    Didn't get a code?
                    <a href="{{ route('code.resend', ['token' => $token]) }}" id="customer_register_link">Resend it</a>
                </p>
            </div>
        </div>
    </form>

    <script>
        function moveFocus(event, currentId, nextId) {
            const input = event.target;
            input.value = input.value.replace(/[^0-9A-Za-z]/g, '').toUpperCase();

            if (input.value && nextId) {
                document.getElementById(nextId).focus();
            }

            if (event.inputType === 'deleteContentBackward' && input.value === '' && currentId !== 'code_1') {
                const prevId = 'code_' + (parseInt(currentId.split('_')[1]) - 1);
                document.getElementById(prevId).focus();
            }
        }
    </script>
</div>
