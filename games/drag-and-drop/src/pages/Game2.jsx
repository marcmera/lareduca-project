import React, { useState } from 'react';
import { DndProvider } from 'react-dnd';
import { HTML5Backend } from 'react-dnd-html5-backend';
import { useNavigate } from 'react-router-dom'
import '../styles/home.css';


function Game2() {
  const navigate = useNavigate()
  const item1 = sessionStorage.getItem('item1');
  const item2 = sessionStorage.getItem('item2');
  const item3 = sessionStorage.getItem('item3');
  const item4 = sessionStorage.getItem('item4');
  const item5 = sessionStorage.getItem('item5');
  const item6 = sessionStorage.getItem('item6');


  

  const handleDrop = (targetListId, item) => {
    const newDroppedItems = { ...droppedItems };
    newDroppedItems[targetListId] = item;
    setDroppedItems(newDroppedItems);
  };

  const handleConfirm = () => {
    navigate('/final');
  
  };
  return (
    <DndProvider backend={HTML5Backend}>
      <div className="App">
        
        <div className="Story">
          <h1>Historia Inventada</h1>
        <p>
          Finalmente, <label id="item1">{item1} </label> y <label id="item1">{item2} </label>, tras superar cada desafío,
           decidieron dar un paso más en su relación. Se comprometieron y, con el tiempo,
            construyeron una familia llena de <label id="item1">{item5} </label> y <label id="item1">{item6} </label>.
            Sus hijos crecieron rodeados de la misma pasión por las <label id="item1">{item3} </label> que sus padres compartían.
            A medida que el tiempo avanzaba, <label id="item1">{item1} </label> y <label id="item1">{item2} </label> envejecieron juntos,
            recordando con cariño los momentos que habían vivido.
        </p>
          <button onClick={handleConfirm}>
            Fin
          </button>
        </div>
      </div>
    </DndProvider>);
}

export default Game2;
