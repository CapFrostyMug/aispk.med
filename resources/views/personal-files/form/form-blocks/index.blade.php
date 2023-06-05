@csrf
<fieldset>
    <legend><h5><strong>Паспортные данные</strong></h5></legend>
    @include('personal-files.form.form-blocks.passportsData')
</fieldset>

<fieldset>
    <legend><h5><strong>Контактная информация</strong></h5></legend>
    @include('personal-files.form.form-blocks.contactsInfo')
</fieldset>

<fieldset>
    <legend><h5><strong>Информация для поступления</strong></h5></legend>
    @include('personal-files.form.form-blocks.admissionInfo2')
</fieldset>

<fieldset>
    <legend><h5><strong>Сведения об образовании</strong></h5></legend>
    @include('personal-files.form.form-blocks.educationInfo')
</fieldset>

<fieldset>
    <legend><h5><strong>Сведения о трудовом стаже</strong></h5></legend>
    @include('personal-files.form.form-blocks.seniorityInfo')
</fieldset>

<fieldset>
    <legend><h5><strong>Дополнительная информация</strong></h5></legend>
    @include('personal-files.form.form-blocks.otherInfo')
</fieldset>

<fieldset>
    <legend><h5><strong>Информация о родственниках</strong></h5></legend>
    @include('personal-files.form.form-blocks.relativeInfo')
</fieldset>

<fieldset>
    <legend><h5><strong>Информация о зачислении</strong></h5></legend>
    @include('personal-files.form.form-blocks.enrollmentInfo')
</fieldset>
