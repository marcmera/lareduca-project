// DropTarget.jsx
import { useDrop } from 'react-dnd';

const DropTarget = ({ onDrop, listId, allowedListId, children }) => {
  const [{ isOver }, drop] = useDrop({
    accept: 'ITEM',
    drop: (item) => onDrop(listId, item.content),
    canDrop: (item) => item.listId === allowedListId,
    collect: (monitor) => ({
      isOver: !!monitor.isOver(),
    }),
  });

  return (
    <div ref={drop} className={`DropTarget ${isOver ? 'highlight' : ''}`}>
      {children}
    </div>
  );
};

export default DropTarget;
