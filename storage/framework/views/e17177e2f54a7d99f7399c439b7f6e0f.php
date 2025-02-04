<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  value="<?php echo e(old('nombre',$medico->nombre)); ?>" required>
    <label for="nombre">Nombre</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" placeholder="Nombre"  value="<?php echo e(old('apellido_pat',$medico->apellido_pat)); ?>" required>
    <label for="apellido_pat">Apellido Paterno</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" placeholder="Nombre"  value="<?php echo e(old('apellido_mat',$medico->apellido_mat)); ?>" required>
    <label for="apellido_mat">Apellido Materno</label>
</div>
<?php /**PATH C:\laragon\www\medica\resources\views/medicos/form-fields.blade.php ENDPATH**/ ?>