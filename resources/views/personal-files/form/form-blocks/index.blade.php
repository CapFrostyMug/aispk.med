@csrf
<fieldset>
    <legend><h5><strong>Паспортные данные</strong></h5></legend>
    @include('personal-files.form.form-blocks.passport')
</fieldset>

<fieldset>
    <legend><h5><strong>Контактная информация</strong></h5></legend>
    @include('personal-files.form.form-blocks.contacts')
</fieldset>

<fieldset>
    <legend><h5><strong>Информация для поступления</strong></h5></legend>
    @include('personal-files.form.form-blocks.admission')
</fieldset>

<fieldset>
    <legend><h5><strong>Сведения об образовании</strong></h5></legend>
    @include('personal-files.form.form-blocks.education')
</fieldset>

<fieldset>
    <legend><h5><strong>Сведения о трудовом стаже</strong></h5></legend>
    @include('personal-files.form.form-blocks.seniority')
</fieldset>

<fieldset>
    <legend><h5><strong>Дополнительная информация</strong></h5></legend>
    @include('personal-files.form.form-blocks.specialCircumstances')
</fieldset>

<fieldset>
    <legend><h5><strong>Информация о родственниках</strong></h5></legend>
    @include('personal-files.form.form-blocks.relatives')
</fieldset>

<fieldset>
    <legend><h5><strong>Информация о зачислении</strong></h5></legend>
    @include('personal-files.form.form-blocks.enrollment')
</fieldset>
