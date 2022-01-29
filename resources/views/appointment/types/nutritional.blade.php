@if (request()->has('assessment') and request()->get('assessment') == true)

    <div class="row">
        <div class="col-3">
            <x-ui.form.input-group label="Weight" type="number" name="weight" step="0.01" suffix="kg" required />
        </div>
        <div class="col-3">
            <x-ui.form.input-group label="Height" type="number" name="height" step="0.01" suffix="cm" required />
        </div>
        <div class="col-3">
            <x-ui.form.select label="Weight For Age" name="wfa">
                <option>Normal</option>
                <option>Overweight</option>
                <option>Underweight</option>
            </x-ui.form.select>
        </div>
        <div class="col-3">
            <x-ui.form.select label="Height For Age" name="hfa">
                <option>Normal</option>
                <option>Overweight</option>
                <option>Underweight</option>
            </x-ui.form.select>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <x-ui.form.select label="Weight for Height" name="wfh">
                <option>Normal</option>
                <option>Overweight</option>
                <option>Underweight</option>
            </x-ui.form.select>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <div class="form-label">Nutrition Status</div>
                <div>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nutrition_status" value="normal" checked=""
                            required>
                        <span class="form-check-label">Normal</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nutrition_status" value="overweight"
                            required>
                        <span class="form-check-label">Overweight</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nutrition_status" value="underweight"
                            required>
                        <span class="form-check-label">Underweight</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="form-label">Other Nutrition Details</div>
                @php
                    $vac = $appointment->citizen->props['needVaccine'] ?? false;
                    $vit = $appointment->citizen->props['needVitamins'] ?? false;
                @endphp

                <div>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="need_vac" @if($vac) checked @endif>
                    <span class="form-check-label">Need Vaccine</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="need_vit" @if($vit) checked @endif>
                    <span class="form-check-label">Need Vitamins</span>
                  </label>
                </div>
              </div>
        </div>
    </div>

@else

    <x-ui.table.table title="Nutitional Assessment">
        @php($_nutritional = $appointment->medic)
        <tbody>

            <tr>
                <td><strong>Weight: </strong>{{ $_nutritional->weight }} kg</td>
                <td><strong>Height: </strong>{{ $_nutritional->height }} cm</td>
            </tr>

            <tr>
                <td><strong>Weight for Age: </strong>{{ $_nutritional->wfa }}</td>
                <td><strong>Height for Age: </strong>{{ $_nutritional->hfa }}</td>
            </tr>

            <tr>
                <td><strong>Weight for Height: </strong> {{ $_nutritional->wfh }}</td>
                <td>
                    <strong>Needs: </strong>

                    @if($appointment->citizen->props['needVaccine'])
                        Vaccine
                    @endif

                    @if($appointment->citizen->props['needVitamins'])
                        Vitamins
                    @endif
                </td>
            </tr>

            <tr>
                <td><strong>Diagnosis / Remarks: </strong> {{ $appointment->remarks }}</td>
                <td><strong>Nutrition Status: </strong> {{ucfirst($appointment->citizen->props['nutritionStatus'] ?? 'Normal')}}</td>
            </tr>
        </tbody>
    </x-ui.table.table>
@endif
