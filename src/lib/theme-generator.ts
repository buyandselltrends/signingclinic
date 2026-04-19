import JSZip from 'jszip';
import { saveAs } from 'file-saver';
import { themeFiles } from './theme-files';

export const downloadTheme = async () => {
  const zip = new JSZip();
  const themeFolder = zip.folder('voxlingo-theme');
  
  if (!themeFolder) return;

  Object.entries(themeFiles).forEach(([filePath, content]) => {
    themeFolder.file(filePath, content);
  });

  const content = await zip.generateAsync({ type: 'blob' });
  saveAs(content, 'voxlingo-theme.zip');
};
