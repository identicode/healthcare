@if (request()->has('assessment') and request()->get('assessment') == true)

    <div x-data="{preg: 'pregnant'}">
        <div class="row">
            <div class="col">
                <x-ui.form.input-group label="Weight" type="number" name="weight" suffix="kg" step="0.01" required />
            </div>
            <div class="col">
                <x-ui.form.input-group label="Height" type="number" name="height" suffix="cm" step="0.01" required />
            </div>
        </div>

        <div class="row">
            <div class="col">
                <x-ui.form.input label="Blood Presure" type="text" name="blood_presure" step="0.01" required />
            </div>
            <div class="col">
                <x-ui.form.input label="Tummy Size" type="number" name="tummy" step="0.01" />
            </div>
        </div>



        <div class="mb-3">
            <div class="form-label">Pregnancy Status</div>
            <div>
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="preg" value="pregnant" x-model="preg" checked=""
                        required>
                    <span class="form-check-label">Pregnant</span>
                </label>
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="preg" value="miscarriage" x-model="preg"
                        required>
                    <span class="form-check-label">Miscarriage</span>
                </label>
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="preg" value="deliver" x-model="preg" required>
                    <span class="form-check-label">Delivered</span>
                </label>
            </div>
        </div>

        <template x-if="preg == 'deliver'">
            <div>
                <h4>Baby Information</h4>
                <div class="row">
                    <div class="col">
                        <x-ui.form.input label="First Name" name="baby[name][first]" required />
                    </div>
                    <div class="col">
                        <x-ui.form.input label="Middle Name" name="baby[name][middle]" />
                    </div>
                    <div class="col">
                        <x-ui.form.input label="Last Name" name="baby[name][last]" required />
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <x-ui.form.input-group label="Weight" type="number" name="baby[weight]" suffix="kg" step="0.01"
                            required />
                    </div>
                    <div class="col">
                        <x-ui.form.input-group label="Height" type="number" name="baby[height]" suffix="cm" step="0.01"
                            required />
                    </div>
                    <div class="col">
                        <x-ui.form.select label="Sex" name="baby[sex]" required>
                            <option>MALE</option>
                            <option>FEMALE</option>
                        </x-ui.form.select>
                    </div>
                    <div class="col">
                        <x-ui.form.input label="Birthdate" type="date" name="baby[birthdate]"
                            value="{{ date('Y-m-d') }}" required />
                    </div>
                </div>
            </div>

        </template>
    </div>

    @once
        @push('js-lib')
            <!-- Libs JS -->
            <script src="{{ asset('libs/alpine/alpine.min.js') }}"></script>>
        @endpush
    @endonce


@else

    @php($medic = $appointment->medic)




        <div class="col-12">
            <x-ui.table.table title="Maternal Assessment">
                <tbody>

                    <tr>
                        <td><strong>Weight: </strong>{{ number_format($medic->weight) }} kg</td>
                        <td><strong>Height: </strong>{{ number_format($medic->height) }} cm</td>
                    </tr>

                    <tr>
                        <td><strong>Blood Pressure: </strong>{{ number_format($medic->blood_pressure) }}</td>
                        <td><strong>Tummy Size: </strong>{{ number_format($medic->tummy) }}</td>
                    </tr>

                    <tr>
                        <td colspan="2"><strong>Diagnosis / Remarks: </strong> {{ $appointment->remarks }}</td>
                    </tr>


                </tbody>
            </x-ui.table.table>
        </div>

        @if ($medic->baby !== null)

        <div class="col-12">
               <x-ui.table.table title="Baby Details">
                    <tr>
                        <td colspan="2"><strong>First Name: </strong> {{ $medic->baby_info->name['first'] }}</td>
                        <td><strong>Last Name: </strong> {{ $medic->baby_info->name['last'] }}</td>
                        <td><strong>Middle Name: </strong> {{ $medic->baby_info->name['middle'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Weight: </strong> {{ $medic->baby_info->props['birth']['weight'] ?? ''}}kg</td>
                        <td><strong>Height: </strong> {{$medic->baby_info->props['birth']['weight'] ?? '' }}cm</td>
                        <td><strong>Sex: </strong> {{ $medic->baby_info->sex }}</td>
                        <td><strong>Date of Birth: </strong> {{ $medic->baby_info->dob->format('F d, Y') }}</td>
                    </tr>
               </x-ui.table.regular>
        </div>
        @endif








@endif
