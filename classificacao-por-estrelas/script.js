/*	 Opção	   		Padrão    Descrição 
	totalStars			5		Quantidade de estrelas para mostrar
	initialRating		0 0		Classificação inicial aplicada à carga
	minRating			0 0		Especifique a classificação mais baixa
	starSize			40.		largura em pixels de cada estrela
	useFullStars		falso	taxa usando estrelas inteiras, se ativado, ele não usa meias etapas
	emptyColor			cinza claro	Cor atribuída a uma estrela vazia
	hoverColor			laranja	Cor atribuída à estrela pairada
	activeColor			ouro	Cor atribuída à estrela classificada ativa
	ratedColor			carmesim	Cor atribuída à estrela classificada manualmente
	useGradient			verdade		Estrelas ativas usarão coloração gradiente
						Para usar esta opção, você precisa preencher o objeto [starGradient]
	starGradient		{início: '# FEF7CD', final: '# FF9511'}	Definir as cores estrela e final do gradiente
	somente leitura		false	Se false, qualquer interação está desativada
	disableAfterRate	true	Remove outros eventos depois que uma taxa é selecionada
	strokeWidth			0 0		Define a espessura da borda, 0 é desativado
	strokeColor			Preto	Define a cor da borda
	starShape			'straight' ou 'rounded'	Alterar o tipo de forma de estrela
	baseUrl				false	quando ativado (verdadeiro), habilita a compatibilidade com a tag base na seção da cabeça
	forceRoundUp		false	se verdadeiro, força o arredondamento da classificação inicial para a metade superior mais
	próxima, mesmo que o valor esteja mais próximo da menor (1,1 -> 1,5 em vez de 1,1 -> 1,0)
	
	METODOS
	method			arguments													description
	unload	 																	Destrói a instância e remove os eventos anexados a ela
	setRating		0 a um máximo de estrelas (int), redondo (booleano)			Define manualmente a classificação
	getRating	 																Obtém a classificação atual da instância
	resize			1 to 200													Redimensione as estrelas rapidamente
	setReadOnly		Boolean														Desativar ou ativar estrelas manualmente
	
	EVENTOS
	método		descrição
	onHover		executa um retorno de chamada ao passar o mouse
	onLeave		executa um retorno de chamada ao sair do mouse
	
	$('your-selector').starRating({
		onHover: function(currentIndex, currentRating, $el){
			// faça algo na passagem do mouse
		},
		onLeave: function(currentIndex, currentRating, $el){
			// faz alguma coisa após o mouseout
		}
	});
	
	
	Retornos de chamada = Callbacks
	$('your-selector').starRating({
		callback: function(currentRating, $el){
			// faça algo após a classificação
		}
	});
	
	
*/


$(function(){
	$(".estrelas").starRating({
		totalStars: 5, 
		initialRating: 0, 
		minRating: 0, 
		starSize: 40, 
		useFullStars: false,
		emptyColor: '#d1d1d1',
		hoverColor: '#e03e3e',
		activeColor: '#eddc89',
		strokeColor: '#000',
		callback:function(currentRating, $el){
			alert('Salvo no banco de dados'); // faça algo após a classificação
		}
	});	
	
});