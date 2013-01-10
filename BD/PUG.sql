SELECT uea.nombreuea,uea.siglas,uea.grupo,profesores.nombre 
FROM uea, profesores
WHERE uea.profesores_idprofesores=profesores.idprofesores
ORDER BY uea.nombreuea;