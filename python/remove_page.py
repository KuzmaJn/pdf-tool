import sys
from pypdf import PdfReader, PdfWriter

if len(sys.argv) != 4:
    print("Usage: remove_page.py input.pdf page_number output.pdf")
    sys.exit(1)

input_pdf = sys.argv[1]
page_number = int(sys.argv[2]) - 1  # 0-based pre pypdf
output_pdf = sys.argv[3]

try:
    reader = PdfReader(input_pdf)
    writer = PdfWriter()
    num_pages = len(reader.pages)
    if not (0 <= page_number < num_pages):
        print(f"Error: Page with this number doesn't exist in this pdf file.")
        sys.exit(1)
    for i, page in enumerate(reader.pages):
        if i != page_number:
            writer.add_page(page)
    writer.write(output_pdf)
except Exception as e:
    print(f"Error: {e}")
    sys.exit(1)
