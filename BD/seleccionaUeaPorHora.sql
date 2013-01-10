SELECT uea.nombreuea FROM uea
WHERE iduea IN(
SELECT dias_uea_has_horarios.iduea
FROM dias_uea_has_horarios
WHERE dias_uea_has_horarios.iddias=1
AND dias_uea_has_horarios.idhorarios=1);



