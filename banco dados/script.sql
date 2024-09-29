SELECT idDocumento 
FROM documento d 
WHERE d.prazo_A> now() 
AND d.Aluno_Usuario_idusuario = 1
ORDER BY trimestre
LIMIT 1;

SELECT r.questao, r.valor, r.texto, d.representantes, d.conselheiro, d.participantes, d.Aluno_Usuario_idusuario
FROM documento d INNER JOIN resposta r
	ON d.idDocumento = r.Documento_idDocumento
WHERE d.idDocumento = 1;


UPDATE documento
SET representantes = 'Representantes teste',
	conselheiro = 'conselheiro teste',
    participantes = 'participantes teste'
WHERE idDocumento = 1
LIMIT 1;

UPDATE resposta
SET valor = 3,
	texto = 'texto teste'
WHERE questao = 1 AND Documento_idDocumento = 1;


SELECT di.nome, a.turma, d.trimestre, d.prazo_A, d.prazo_P, d.idDocumento
FROM aluno a INNER JOIN documento d
	ON a.Usuario_idusuario = d.Aluno_Usuario_idusuario
    INNER JOIN disciplina_has_curso dc
		ON d.Grade_curricular_anual_idGrade = dc.Grade_curricular_anual_idGrade
        INNER JOIN disciplina di
			ON dc.Disciplina_idDisciplina = di.idDisciplina
WHERE dc.Professor_Usuario_idusuario = 3;

SELECT dc.*
FROM aluno a INNER JOIN documento d
	ON a.Usuario_idusuario = d.Aluno_Usuario_idusuario
    INNER JOIN disciplina_has_curso dc
		ON d.Grade_curricular_anual_idGrade = dc.Grade_curricular_anual_idGrade
WHERE dc.Professor_Usuario_idusuario = 4;
